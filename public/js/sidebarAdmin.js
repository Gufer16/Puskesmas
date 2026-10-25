const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const toggleButton = document.getElementById('toggleSidebar');

        toggleButton.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                sidebar.classList.toggle('show');
            } else {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
            }
        });

        document.querySelectorAll('.menu-item').forEach(function(item) {
            item.addEventListener('click', function() {
                if (this.tagName === 'A') {
                    document.querySelectorAll('.menu-item').forEach(function(menu) {
                        menu.classList.remove('active');
                    });

                    this.classList.add('active');
                }
            });
        });

        document.getElementById('currentDate').textContent =
            new Intl.DateTimeFormat('id-ID', {
                day: 'numeric',
                month: 'short',
                year: 'numeric'
            }).format(new Date());

        document.addEventListener('click', function(event) {
            if (
                window.innerWidth <= 768 &&
                !sidebar.contains(event.target) &&
                !toggleButton.contains(event.target)
            ) {
                sidebar.classList.remove('show');
            }
        });