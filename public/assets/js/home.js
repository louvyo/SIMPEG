// This is the JavaScript file that will run on the home page
document.addEventListener("DOMContentLoaded", function () {
    // Particle configuration
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

    // Initialize particles
    if (window.particlesJS) {
        particlesJS("particles-js", particleConfig);
    }

    // Loading state for login button
    const loginButton = document.querySelector('button[wire\\:click="login"]');
    if (loginButton) {
        loginButton.addEventListener('click', function() {
            this.disabled = true; // Disable the button
            this.classList.add('opacity-50'); // Change appearance
        });
    } // Closing bracket added here

    // Dashboard specific functionality
    console.log("Dashboard scripts initialized.");
});
