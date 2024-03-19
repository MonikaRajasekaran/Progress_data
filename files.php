<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progess Data</title>
    <!----Tailwind Cdn Link-->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <section class="py-8">
        <div class="container px-4 mx-auto">
          <div class="flex flex-wrap items-center mb-6">
            <h3 class="text-xl font-bold" >Files from Project Example</h3>
            <div class="w-full md:w-auto my-6 md:my-0 flex items-center ml-auto mr-4 pr-4 bg-white border rounded">
              <input id="searchInput" class="pl-2 py-3 text-sm text-gray-200" type="text" placeholder="Type to search...">
              <button onclick="search()" class="ml-2 text-gray-200 hover:text-gray-300">
                  <img src="https://cdn-icons-png.freepik.com/512/6934/6934543.png" alt="serach" class="w-6 h-5">
              </button>
              <button onclick="sortAZ()" class="ml-2 text-gray-500 hover:text-gray-300">
                  Sort A-Z
              </button>
              <button onclick="sortZA()" class="ml-2 text-gray-500 hover:text-gray-300">
                  Sort Z-A
              </button>
          </div>
            <a class="flex items-center py-2 px-4 mr-3 bg-indigo-500 hover:bg-indigo-600 rounded text-xs text-white transition duration-200" href="index.php">
              <span >Home</span>
            </a>
          </div>
          <div id="fileContainer" class="pl-4 pr-6 py-4 mb-2 bg-white shadow rounded">
            <!-- Your file content goes here -->
          </div>
        </div>
      </section>

      <script>
        var files = [
            { name: "Anusha", time: "1h ago", size: "25MB" },
            { name: "Arun", time: "1h ago", size: "25MB" },
            { name: "Bala", time: "1h ago", size: "25MB" },
            { name: "Monika", time: "1h ago", size: "25MB" },
            { name: "David", time: "1h ago", size: "25MB" },
            { name: "Jeni", time: "1h ago", size: "25MB" }
        ];

        function displayFiles(filesData) {
            var fileContainer = document.getElementById('fileContainer');
            fileContainer.innerHTML = '';

            filesData.forEach(function(file) {
                var fileElement = `
                    <div class="pl-4 pr-6 py-4 mb-2 bg-white shadow rounded file">
                        <div class="flex flex-wrap items-center -mx-4">
                            <div class="w-full md:w-3/6 mb-4 md:mb-0 px-4 flex items-center">
                                <img class="mr-3 h-6" src="artemis-assets/images/file-mp4.svg" alt="">
                                <h4 class="text-xs font-medium">${file.name}</h4>
                            </div>
                            <div class="w-auto ml-auto mr-16 px-4 flex items-center text-xs text-gray-500">
                                <p>${file.time}</p>
                            </div>
                            <div class="w-auto mr-16 px-4">
                                <p class="text-xs text-gray-500">${file.size}</p>
                            </div>
                        </div>
                    </div>
                `;
                fileContainer.innerHTML += fileElement;
            });
        }

        displayFiles(files);

        function search() {
            var input, filter, filesData, filteredFiles;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            filesData = files;
            filteredFiles = filesData.filter(function(file) {
                return file.name.toUpperCase().includes(filter);
            });
            displayFiles(filteredFiles);
        }

        function sortAZ() {
            var sortedFiles = files.slice().sort(function(a, b) {
                return a.name.localeCompare(b.name);
            });
            displayFiles(sortedFiles);
        }

        function sortZA() {
            var sortedFiles = files.slice().sort(function(a, b) {
                return b.name.localeCompare(a.name);
            });
            displayFiles(sortedFiles);
        }
    </script>
</body>
</html>
