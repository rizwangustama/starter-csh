const colors = require("tailwindcss/colors");

module.exports = {
    // content: require('fast-glob').sync([
    //     './resources/js/**/*.js',
    //     './resources/js/**/*.vue',
    //     './resources/sass/*.scss',
    //     './resources/sass/**/*.scss',
    //     './**/*.php',
    //     './**/**/*.php',
    // ], { dot: true }),
    content: [
        './resources/js/**/*.js',
        './resources/js/**/*.vue',
        './resources/sass/*.scss',
        './resources/sass/**/*.scss',
        './**/*.php',
        './**/**/*.php',
    ],
    theme: {
        fontFamily: {
            body: ["Inter", "sans-serif"],
            default: "Inter",
            roboto: 'Roboto'
        },
        container: {
            center: true,
            padding: {
                DEFAULT: "1rem",
                sm: "2rem",
                lg: "2.5rem",
                xl: "3rem",
                "2xl": "3.5rem",
            },
        },
        extend: {
            colors: {
                primary: '#094651',
                secondary: '#1A5761',
                light: '#ABDDE6',
                white: '#FFFFFF',
                altGreen: '#85B841',
                altBlack: '#030616',
                'hover-green': '#709b36',
                'hover-secondary': '#073a43',
                'neutral': '#CDCDD0',
                'neutral-70': '#4F515C',
                'blue': '#17247e',
                'red': '#da001d',
                'navy': '#002a4c',
                'accent': '#25CED1'
            },
            minHeight: {
                content: 'calc(100vh - 423px);',
                "600": '600px'
            },
            maxHeight: {
                content: 'calc(100vh - 423px);',
                "400": '400px',
                "600": '600px'
            },
            padding: {
                '60px': '60px',
                '235px': '235px'
            },
        },
    },
    variants: {},
    plugins: [
        require('@tailwindcss/line-clamp'),
    ],
};
