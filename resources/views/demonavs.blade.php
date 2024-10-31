<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Navigation Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Header Navigation -->
    <header class="bg-light p-3">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Header</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#header-nav" aria-controls="header-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="header-nav">
                    <ul class="navbar-nav ms-auto">
                        <!-- Header navigation will be inserted here -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Footer Navigation -->
    <footer class="bg-dark text-light p-4 mt-5">
        <div class="container">
            <nav id="footer-nav" class="row">
                <!-- Footer navigation will be inserted here -->
            </nav>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        async function fetchNavigation() {
            try {
                const response = await fetch('http://aft_website_v1.test/api/navigations'); // Replace with your API endpoint
                const data = await response.json();

                // Render Header Navigation
                const headerNav = document.querySelector('#header-nav .navbar-nav');
                const headerNavigations = data.HEADER.navigations;
                headerNavigations.forEach(nav => {
                    const navItem = document.createElement('li');
                    navItem.classList.add('nav-item');
                    navItem.innerHTML = `<a class="nav-link" href="${nav.url || '#'}">${nav.name}</a>`;
                    headerNav.appendChild(navItem);

                    if (nav.hasSubmenu && nav.submenus) {
                        const submenuDropdown = document.createElement('ul');
                        submenuDropdown.classList.add('dropdown-menu');
                        nav.submenus.forEach(submenu => {
                            const submenuItem = document.createElement('li');
                            submenuItem.innerHTML = `<a class="dropdown-item" href="${submenu.url || '#'}">${submenu.title}</a>`;
                            submenuDropdown.appendChild(submenuItem);
                        });
                        navItem.classList.add('dropdown');
                        navItem.querySelector('.nav-link').classList.add('dropdown-toggle');
                        navItem.querySelector('.nav-link').setAttribute('data-bs-toggle', 'dropdown');
                        navItem.appendChild(submenuDropdown);
                    }
                });

                // Render Footer Navigation
                const footerNav = document.getElementById('footer-nav');
                const footerNavigations = data.FOOTER.navigations;
                footerNavigations.forEach(nav => {
                    const navCol = document.createElement('div');
                    navCol.classList.add('col-6', 'col-md-3');
                    navCol.innerHTML = `<h5>${nav.name}</h5>`;
                    footerNav.appendChild(navCol);

                    if (nav.hasSubmenu && nav.submenus) {
                        const submenuList = document.createElement('ul');
                        submenuList.classList.add('list-unstyled');
                        nav.submenus.forEach(submenu => {
                            const submenuItem = document.createElement('li');
                            submenuItem.innerHTML = `<a href="${submenu.url || '#'}" class="text-light">${submenu.title}</a>`;
                            submenuList.appendChild(submenuItem);
                        });
                        navCol.appendChild(submenuList);
                    }
                });
            } catch (error) {
                console.error('Error fetching navigation data:', error);
            }
        }

        // Fetch and render navigation on page load
        window.onload = fetchNavigation;
    </script>
</body>
</html>
