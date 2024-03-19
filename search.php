<?php
// Define your files data here
$files = [
    ["name" => "Anusha", "time" => "1h ago", "size" => "25MB"],
    ["name" => "Arun", "time" => "1h ago", "size" => "25MB"],
    ["name" => "Bala", "time" => "1h ago", "size" => "25MB"],
    ["name" => "Monika", "time" => "1h ago", "size" => "25MB"],
    ["name" => "David", "time" => "1h ago", "size" => "25MB"],
    ["name" => "Jeni", "time" => "1h ago", "size" => "25MB"]
];

// Function to perform search
function searchFiles($files, $query) {
    $filteredFiles = [];
    foreach ($files as $file) {
        if (stripos($file['name'], $query) !== false) {
            $filteredFiles[] = $file;
        }
    }
    return $filteredFiles;
}

// Function to perform sorting
function sortFiles($files, $direction) {
    $names = array_column($files, 'name');
    array_multisort($names, ($direction === 'asc') ? SORT_ASC : SORT_DESC, $files);
    return $files;
}

// Process form submission
if (isset($_GET['submit']) && !empty($_GET['search'])) {
    $searchQuery = $_GET['search'];
    $files = searchFiles($files, $searchQuery);
}

if (isset($_GET['submit_sort'])) {
    $sortDirection = $_GET['sort'];
    $files = sortFiles($files, $sortDirection);
}

// Display files
foreach ($files as $file) {
    echo '<div class="pl-4 pr-6 py-4 mb-2 bg-white shadow rounded">
            <div class="flex flex-wrap items-center -mx-4">
              <div class="w-full md:w-3/6 mb-4 md:mb-0 px-4 flex items-center">
                <img class="mr-3 h-6" src="artemis-assets/images/file-mp4.svg" alt="">
                <h4 class="text-xs font-medium">' . $file['name'] . '</h4>
              </div>
              <div class="w-auto ml-auto mr-16 px-4 flex items-center text-xs text-gray-500">
                <p>' . $file['time'] . '</p>
              </div>
              <div class="w-auto mr-16 px-4">
                <p class="text-xs text-gray-500">' . $file['size'] . '</p>
              </div>
            </div>
          </div>';
}
?>
