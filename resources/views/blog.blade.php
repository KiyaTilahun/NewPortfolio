<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            font-size: 2em;
            margin-bottom: 10px;
        }
        .meta {
            color: #888;
            font-size: 0.9em;
            margin-bottom: 20px;
        }
        .thumbnail {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        .featured {
            color: #ff5722;
            font-weight: bold;
        }
        .category {
            margin-top: 20px;
            font-weight: bold;
        }
        .category span {
            background-color: #f0f0f0;
            padding: 5px 10px;
            border-radius: 5px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <article id="blog-post">
        <!-- Blog post content will be injected here -->
    </article>

    <script>
        // Fetch blog post data from API
        fetch('http://aft_website_v1.test/api/posts/12')
        .then(response => response.json())
        .then(data => {
            const post = data.data.attributes;
            
            // Build HTML for the blog post
            const blogPostHtml = `
                <h1>${post.title}</h1>
                <h4>${post.view_count}</h4>

                <div class="meta">
                    Published on: ${post.published_at} 
                    ${post.is_featured ? '<span class="featured">Featured</span>' : ''}
                </div>
                ${post.thumbnail ? `<img src="${post.thumbnail}" alt="${post.title}" class="thumbnail">` : ''}
                <div class="body">
                    ${post.body ? post.body : 'No content available.'}
                </div>
                <div class="meta">
                    <strong>Meta Title:</strong> ${post.meta_title ? post.meta_title : 'N/A'}<br>
                    <strong>Meta Description:</strong> ${post.meta_description ? post.meta_description : 'N/A'}
                </div>
                <div class="category">
                    Categories:
                    ${data.data.relationships.category.data.length > 0 ? 
                        data.data.relationships.category.data.map(cat => `<span>${cat.name}</span>`).join('') : 'No categories'}
                </div>
            `;

            // Inject the blog post content into the page
            document.getElementById('blog-post').innerHTML = blogPostHtml;
        })
        .catch(error => {
            console.error('Error fetching blog post:', error);
        });
    </script>
</body>
</html>

