function initDynamicHeader() {
    const topBar = document.getElementById('top-bar');
    const header = document.getElementById('dynamic-header');
    const body = document.body;
    const mainNav = document.getElementById('main-nav');

    // ¡La lógica de salida temprana es vital!
    if (!topBar || !header || !mainNav) {
        return;
    }

    // Usaremos requestAnimationFrame para medir la altura, que es más preciso
    // que medir inmediatamente, especialmente al cargar el DOM.
    requestAnimationFrame(() => {
        const topBarHeight = topBar.offsetHeight;
        const mainNavHeight = mainNav.offsetHeight;
        const totalHeaderHeight = topBarHeight + mainNavHeight;

        // A. AJUSTE INICIAL DEL PADDING DEL BODY
        body.style.paddingTop = `${totalHeaderHeight}px`;

        // B. INICIALIZAR LAS TRANSICIONES EN EL HEADER PADRE
        header.style.transition = 'transform 0.3s ease-in-out';

        function handleScroll() {
            const scrollPosition = window.scrollY;

            // Umbral de activación
            if (scrollPosition > topBarHeight + 5) {
                // OCULTAR (SLIDE OUT)
                topBar.classList.add('translate-y-[-100%]');
                topBar.classList.remove('translate-y-0');
                header.style.transform = `translateY(-${topBarHeight}px)`;
            } else {
                // MOSTRAR (SLIDE IN)
                topBar.classList.remove('translate-y-[-100%]');
                topBar.classList.add('translate-y-0');
                header.style.transform = 'translateY(0)';
            }
        }

        // Inicializar el estado de la barra superior
        topBar.classList.add('translate-y-0');

        // Asignar el listener
        window.addEventListener('scroll', handleScroll);
        handleScroll();
    });
}

// Exportamos la función para que app.js la pueda importar
export default initDynamicHeader;