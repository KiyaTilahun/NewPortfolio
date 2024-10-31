<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Details</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Adjust your CSS file -->
    <style>
        .category-details, .child-list, .file-list {
            margin-left: 20px;
        }
        .folder a {
            display: block;
            margin-bottom: 8px;
            text-decoration: none;
            color: blue;
        }
        .file-list a {
            display: inline-block;
            margin-right: 10px;
            color: green;
        }
        .file-list .zip-link {
            display: block;
            margin-top: 10px;
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Category Details</h1>
        <div id="category-details">
            <!-- Category details will be populated here -->
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const url = 'http://aft_website_v1.test/api/mediaCategories/2'; // Replace with dynamic URL if needed
            fetchCategoryDetails(url);
        });

        function fetchCategoryDetails(url) {
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data && data.data) {
                        const container = document.getElementById('category-details');
                        container.innerHTML = renderCategoryDetails(data.data);
                    } else {
                        console.error('Invalid data format:', data);
                    }
                })
                .catch(error => console.error('Error fetching category details:', error));
        }

        function renderCategoryDetails(category) {
            return `
                <h2>${category.name}</h2>
                ${category.self_link ? `<p><a href="${category.self_link}" class="back-to-list">Back to List</a></p>` : ''}
                ${category.children && category.children.length > 0 ? `
                    <h3>Children:</h3>
                    <ul class="child-list">
                        ${category.children.map(child => `
                            <li><a href="${child.folder_link}">${child.name}</a></li>
                        `).join('')}
                    </ul>
                ` : ''}
                ${category.files && category.files.length > 0 ? `
                    <h3>Files:</h3>
                    <ul class="file-list">
                        ${category.files.map(file => `
                            <li>
                                <a href="${file.file_path[0]}" download>${file.file_label}</a>
                                ${file.zip_download_link ? `<a href="${file.zip_download_link}" class="zip-link">Download ZIP</a>` : ''}
                                <p>${file.description}</p>
                                <p>Created at: ${new Date(file.created_at).toLocaleString()}</p>
                            </li>
                        `).join('')}
                    </ul>
                ` : ''}
            `;
        }
    </script>
</body>
</html>
