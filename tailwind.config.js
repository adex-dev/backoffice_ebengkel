/** @type {import('tailwindcss').Config} */
module.exports = {
    important: true,
    mode: 'production',
    darkMode: "class",
    content: [
        'public/assets/dist/css/index.css',
        'app/Views/**/*.{js,html,php}',
    ],
    theme: {
        extend: {
            screens: {
                'sm': '640px',
                'md': '768px',
                'lg': '1100px',
                'xl': '1400px',
                'monitor': { 'min': '640px', 'max': '767px' },
            },
            colors: {
                primary: '#14b8a6',
                dark: '#0f172a',
                secondary: '#6b7280',
                basics: '#b50102'
            },
            fontFamily: {
                'mona-light': ['mona-light', 'sans-serif'],
                'mona-reg': ['mona-reg', 'sans-serif'],
                'mona-black': ['mona-black', 'sans-serif'],
                'mona-bold': ['mona-bold', 'sans-serif'],
                'mona-ultralight': ['mona-ultralight', 'sans-serif'],
            },
        },
        container: {
            center: true,
            padding: '16px'
        },
    },
    plugins: [require('@tailwindcss/forms')],
}

