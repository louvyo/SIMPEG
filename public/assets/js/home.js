// Ini adalah file javascript yang akan dijalankan pada halaman home
document.addEventListener("DOMContentLoaded", function () {
    // Konfigurasi Particle
    const particleConfig = {
        particles: {
            number: {
                value: window.innerWidth < 768 ? 40 : 80,
                density: {
                    enable: true,
                    value_area: 800,
                },
            },
            color: {
                value: "#ffffff",
            },
            shape: {
                type: "circle",
            },
            opacity: {
                value: 0.5,
                random: false,
            },
            size: {
                value: 3,
                random: true,
            },
            line_linked: {
                enable: true,
                distance: 150,
                color: "#ffffff",
                opacity: 0.4,
                width: 1,
            },
            move: {
                enable: true,
                speed: 6,
                direction: "none",
                random: false,
                straight: false,
                out_mode: "out",
            },
        },
        interactivity: {
            detect_on: "canvas",
            events: {
                onhover: {
                    enable: true,
                    mode: "repulse",
                },
                onclick: {
                    enable: true,
                    mode: "push",
                },
            },
        },
    };

    // Inisialisasi Particles
    if (window.particlesJS) {
        particlesJS("particles-js", particleConfig);
    }
});
