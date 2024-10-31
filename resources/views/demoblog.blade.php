<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background: #333;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }

        #blog-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .blog-post {
            background: #fff;
            margin-bottom: 1.5rem;
            padding: 1rem;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .blog-post img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .blog-post h2 {
            margin: 0;
            font-size: 1.5rem;
        }

        .blog-post p {
            margin: 0.5rem 0;
        }

        .blog-post .meta {
            font-size: 0.9rem;
            color: #666;
        }
    </style>
</head>

<body>
    <header>
        <h1>Blog</h1>
    </header>
    <main id="blog-container">
        <!-- Blog posts will be inserted here by JavaScript -->
    </main>
    <nav id="pagination-container">
        <!-- Pagination links will be inserted here by JavaScript -->
    </nav>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const blogContainer = document.getElementById('blog-container');
    const paginationContainer = document.getElementById('pagination-container');
    let currentPage = 1;
    let totalPages = 1;

    function fetchPosts(page = 1) {
        const apiUrl = `http://aft_website_v1.test/api/posts?sort=title&page=${page}`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                currentPage = data.meta.current_page;
                totalPages = data.meta.last_page;
                renderPosts(data.data);
                renderPagination(data.meta.links);
            })
            .catch(error => {
                console.error('Error fetching blog data:', error);
            });
    }

    function renderPosts(posts) {
        blogContainer.innerHTML = '';
        posts.forEach(post => {
            const postElement = document.createElement('div');
            postElement.classList.add('blog-post');

            const content = `
                ${post.attributes.thumbnail ? `<img src="${post.attributes.thumbnail}" alt="${post.attributes.title}">` : ''}
                <h2>${post.attributes.title}</h2>
                <div class="meta">
                    <p><strong>Published:</strong> ${post.attributes.published_at ? post.attributes.published_at : 'Not published'}</p>
                    <p><strong>Created At:</strong> ${post.attributes.created_at}</p>
                    <p><strong>Updated At:</strong> ${post.attributes.updated_at}</p>
                </div>
                <div class="body">${post.attributes.body.slice(0, 150)}...</div>
                ${post.relationships.category.data.length ? `
                    <div class="categories">
                        ${post.relationships.category.data.map(cat => `
                            <div class="category" style="background-color: ${cat.bg_color}; color: ${cat.text_color}; padding: 0.5rem; margin-top: 0.5rem;">
                                ${cat.title}
                            </div>
                        `).join('')}
                    </div>
                ` : ''}
                <a href="/post/${post.id}" class="read-more">Read More</a>
            `;

            postElement.innerHTML = content;
            blogContainer.appendChild(postElement);
        });
    }

    function renderPagination(links) {
        paginationContainer.innerHTML = '';

        links.forEach(link => {
            if (link.label === '&laquo; Previous') {
                const prevLink = document.createElement('a');
                prevLink.href = '#';
                prevLink.innerHTML = link.label;
                if (link.url) {
                    prevLink.addEventListener('click', () => fetchPosts(new URL(link.url).searchParams.get('page')));
                } else {
                    prevLink.classList.add('disabled');
                }
                paginationContainer.appendChild(prevLink);
            } else if (link.label === 'Next &raquo;') {
                const nextLink = document.createElement('a');
                nextLink.href = '#';
                nextLink.innerHTML = link.label;
                if (link.url) {
                    nextLink.addEventListener('click', () => fetchPosts(new URL(link.url).searchParams.get('page')));
                } else {
                    nextLink.classList.add('disabled');
                }
                paginationContainer.appendChild(nextLink);
            } else {
                const pageLink = document.createElement('a');
                pageLink.href = '#';
                pageLink.innerHTML = link.label;
                if (link.url) {
                    pageLink.addEventListener('click', () => fetchPosts(new URL(link.url).searchParams.get('page')));
                } else {
                    pageLink.classList.add('active');
                }
                paginationContainer.appendChild(pageLink);
            }
        });
    }

    fetchPosts(); // Initial fetch
});

    </script>

</body>

</html>
