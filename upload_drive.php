<?php
require 'vendor/autoload.php';

$client = new Google_Client();
$client->setAuthConfig('service-account.json.json');
$client->addScope(Google_Service_Drive::DRIVE);

$service = new Google_Service_Drive($client);
$folderId = "1WcrDzowfH_XqDZbgOn1brxknsKNUhR4c"; 

if(isset($_FILES['file'])){
    $file = $_FILES['file'];

    $fileMetadata = new Google_Service_Drive_DriveFile([
        'name' => $file['name'],
        'parents' => [$folderId]
    ]);

    $content = file_get_contents($file['tmp_name']);

$uploadedFile = $service->files->create($fileMetadata, [
        'data' => $content,
        'mimeType' => $file['type'],
        'uploadType' => 'multipart'
    ]);

    // Make file publicly viewable
    $permission = new Google_Service_Drive_Permission([
        'type' => 'anyone', 
        'role' => 'reader'
    ]);
    $service->permissions->create($uploadedFile->id, $permission);

    $publicUrl = 'https://drive.google.com/uc?id=' . $uploadedFile->id;
    echo json_encode([
        'success' => true, 
        'id' => $uploadedFile->id, 
        'name' => $uploadedFile->name,
        'public_url' => $publicUrl,
        'view_url' => 'https://drive.google.com/file/d/' . $uploadedFile->id . '/view?usp=sharing'
    ]);
} else {
    echo json_encode(['success' => false, 'msg' => 'No file uploaded']);
}
