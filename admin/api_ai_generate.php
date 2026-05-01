<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit();
}

/**
 * YOUR GEMINI API KEY
 * Get one for free at: https://aistudio.google.com/app/apikey
 */
define('GEMINI_API_KEY', 'AIzaSyDmJ0oUlLqnWFXayv01JqFhtE_uArxKCdE'); 

$topic = $_POST['topic'] ?? '';

if (empty($topic)) {
    echo json_encode(['success' => false, 'error' => 'Topic is required']);
    exit();
}

// AUTO-DISCOVER BEST MODEL
$listUrl = "https://generativelanguage.googleapis.com/v1beta/models?key=" . GEMINI_API_KEY;
$chList = curl_init($listUrl);
curl_setopt($chList, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chList, CURLOPT_SSL_VERIFYPEER, false); 
$listResponse = curl_exec($chList);

if (curl_errno($chList)) {
    // FALLBACK TO DEMO MODE IF NO INTERNET
    echo json_encode([
        'success' => true,
        'title' => 'Mastering ' . htmlspecialchars($topic) . ': A Comprehensive Guide',
        'excerpt' => 'Discover the essential strategies and modern approaches to ' . htmlspecialchars($topic) . ' that will elevate your professional workflow in 2024.',
        'content' => '<h3>Introduction</h3><p>In the rapidly evolving landscape of technology, <strong>' . htmlspecialchars($topic) . '</strong> has emerged as a pivotal subject for professionals seeking to stay ahead of the curve.</p><h4>Key Pillars of Success</h4><ul><li><strong>Strategic Implementation:</strong> Understanding the "why" before the "how".</li><li><strong>Modern Toolsets:</strong> Leveraging the latest frameworks to accelerate development.</li><li><strong>Continuous Learning:</strong> Staying updated with industry shifts.</li></ul><p>By focusing on these areas, you can ensure that your approach to ' . htmlspecialchars($topic) . ' is not only effective but also future-proof.</p><p><i>(Note: This is a Demo Response because your server currently has no internet access to reach Google AI.)</i></p>'
    ]);
    exit();
}
$listData = json_decode($listResponse, true);
curl_close($chList);

$selectedModel = "";
if (isset($listData['models'])) {
    foreach ($listData['models'] as $m) {
        if (in_array("generateContent", $m['supportedGenerationMethods'])) {
            $selectedModel = $m['name'];
            if (strpos($m['name'], 'flash') !== false) {
                break; 
            }
        }
    }
}

if (empty($selectedModel)) {
    echo json_encode(['success' => false, 'error' => 'No compatible AI models found for this API key.']);
    exit();
}

$url = "https://generativelanguage.googleapis.com/v1beta/" . $selectedModel . ":generateContent?key=" . GEMINI_API_KEY;

$prompt = "You are a professional technical blogger writing for a premium developer portfolio. 
Write a high-quality blog post about: \"$topic\".
The tone should be professional, insightful, and engaging.

IMPORTANT: Output ONLY a valid JSON object with the following keys:
- title: A catchy, SEO-friendly title.
- excerpt: A 2-sentence engaging summary.
- content: The full blog post in clean HTML (use <h3>, <h4>, <p>, <ul>, <li>, <strong> tags). Do NOT include <html> or <body> tags.

Do not include any other text, markdown formatting like ```json, or explanations.";

$data = [
    "contents" => [
        [
            "parts" => [
                ["text" => $prompt]
            ]
        ]
    ]
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Bypass SSL checks for XAMPP

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo json_encode(['success' => false, 'error' => 'CURL Error (Gen): ' . curl_error($ch)]);
    exit();
}
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 200) {
    echo json_encode(['success' => false, 'error' => 'API Error (Code ' . $httpCode . '): ' . $response]);
    exit();
}

$result = json_decode($response, true);
$rawText = $result['candidates'][0]['content']['parts'][0]['text'] ?? '';

// Clean up potential markdown blocks if AI ignored instructions
$cleanJson = preg_replace('/^```json\s*|```$/m', '', $rawText);
$blogData = json_decode(trim($cleanJson), true);

if ($blogData && isset($blogData['title'])) {
    echo json_encode([
        'success' => true,
        'title'   => $blogData['title'],
        'excerpt' => $blogData['excerpt'],
        'content' => $blogData['content']
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to parse AI response.']);
}
