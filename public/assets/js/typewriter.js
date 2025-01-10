$(document).ready(function() {
    // Typewriter animation code
    $('.typewriter p').css({
        'overflow': 'hidden',
        'border-right': '.15em solid orange',
        'white-space': 'nowrap',
        'margin': '0 auto',
        'letter-spacing': '.15em',
        'animation': 'typing 3.5s steps(40, end), blink-caret .75s step-end infinite, deleting 3.5s steps(40, end) 7s forwards, loop 10.5s infinite'
    });
});
