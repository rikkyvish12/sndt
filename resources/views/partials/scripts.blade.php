<script>
    // Mobile menu toggle
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
            
            // Close mobile menu when clicking on a link
            document.querySelectorAll('#mobile-menu a').forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenu.classList.add('hidden');
                });
            });
        }
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    // Calculate offset based on whether we have a fixed sidebar
                    let offset = 80;
                    const sidebar = document.querySelector('.sidebar-links');
                    if (sidebar && window.innerWidth >= 768) { // Assuming sidebar is visible on medium screens and up
                        offset = sidebar.offsetHeight + 20;
                    }
                    
                    window.scrollTo({
                        top: targetElement.offsetTop - offset,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Handle sidebar navigation active state
        const sidebarLinks = document.querySelectorAll('.sidebar-link');
        const sections = document.querySelectorAll('div[id]');
        
        function setActiveLink() {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (pageYOffset >= (sectionTop - 100)) { // 100px offset to trigger early
                    current = section.getAttribute('id');
                }
            });
            
            sidebarLinks.forEach(link => {
                link.classList.remove('bg-purple-50', 'text-purple-600');
                link.classList.add('text-gray-700');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.remove('text-gray-700');
                    link.classList.add('bg-purple-50', 'text-purple-600');
                }
            });
        }
        
        // Add scroll event listener for active link
        window.addEventListener('scroll', setActiveLink);
        setActiveLink(); // Set initial state
        
        // Make sidebar fixed when scrolling down
        const sidebar = document.querySelector('.sidebar-links');
        if (sidebar) {
            const sidebarTop = sidebar.offsetTop;
            const footer = document.querySelector('footer');
            
            window.addEventListener('scroll', function() {
                if (window.pageYOffset >= sidebarTop) {
                    // Check if we're approaching the footer
                    if (footer) {
                        const footerRect = footer.getBoundingClientRect();
                        const windowHeight = window.innerHeight;
                        
                        // If we're getting close to the footer, adjust sidebar positioning
                        if (footerRect.top <= windowHeight * 0.8) { // When footer enters bottom 20% of viewport
                            // Position sidebar to stop before the footer
                            sidebar.style.position = 'fixed';
                            sidebar.style.top = 'auto';
                            sidebar.style.bottom = '6rem'; // 6rem = 96px above footer
                            sidebar.style.left = '1rem';
                            sidebar.style.right = 'auto';
                            sidebar.style.width = 'calc(25% - 2rem)'; // Match lg:w-1/4
                            sidebar.style.overflowY = 'auto';
                            sidebar.style.maxHeight = 'calc(100vh - 12rem)'; // Account for top and bottom spacing
                            sidebar.style.boxSizing = 'border-box';
                        } else {
                            // Normal fixed positioning on left side with fixed dimensions
                            sidebar.style.position = 'fixed';
                            sidebar.style.top = '6rem'; // 6rem = 96px from top
                            sidebar.style.left = '1rem';
                            sidebar.style.bottom = '1rem';
                            sidebar.style.right = 'auto';
                            sidebar.style.width = 'calc(25% - 2rem)'; // Match lg:w-1/4
                            sidebar.style.overflowY = 'auto';
                            sidebar.style.maxHeight = 'calc(100vh - 8rem)'; // Account for top and bottom spacing
                            sidebar.style.boxSizing = 'border-box';
                        }
                    } else {
                        // Normal fixed positioning on left side with fixed dimensions
                        sidebar.style.position = 'fixed';
                        sidebar.style.top = '6rem';
                        sidebar.style.left = '1rem';
                        sidebar.style.bottom = '1rem';
                        sidebar.style.right = 'auto';
                        sidebar.style.width = 'calc(25% - 2rem)'; // Match lg:w-1/4
                        sidebar.style.overflowY = 'auto';
                        sidebar.style.maxHeight = 'calc(100vh - 8rem)'; // Account for top and bottom spacing
                        sidebar.style.boxSizing = 'border-box';
                    }
                    
                    // Add margin to content to account for fixed sidebar
                    const content = document.querySelector('.content-with-sidebar');
                    if (content && !content.classList.contains('lg:ml-64')) {
                        content.classList.add('lg:ml-64');
                    }
                } else {
                    // Reset to original position when not scrolled past
                    sidebar.style.position = 'static';
                    sidebar.style.top = '';
                    sidebar.style.left = '';
                    sidebar.style.bottom = '';
                    sidebar.style.right = '';
                    sidebar.style.width = '';
                    sidebar.style.overflowY = '';
                    sidebar.style.maxHeight = '';
                    
                    // Remove margin when sidebar is not fixed
                    const content = document.querySelector('.content-with-sidebar');
                    if (content) {
                        content.classList.remove('lg:ml-64');
                    }
                }
            });
        }
    });
</script>