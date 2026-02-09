import '../css/app.css';
//import './bootstrap';

import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { StrictMode } from 'react';
import { createRoot } from 'react-dom/client';

import { initializeTheme } from './hooks/use-appearance';

// Import your component
import BottomNavBar from './components/frontend/bottom-bar';
import DropDown from './components/frontend/dropdown-function';
import FileUpload from './components/frontend/file-upload';
import CreateSvgIcon from './components/frontend/home-icon';
import NotificationIcon from './components/frontend/notification-icon';
import TitlebarImageList from './components/frontend/sliding-images';
import SubmitButton from './components/frontend/submit-button';
import TopNavBar from './components/frontend/top-nav-bar';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    resolve: (name) =>
        resolvePageComponent(
            `./pages/${name}.tsx`,
            import.meta.glob('./pages/**/*.tsx'),
        ),
    setup({ el, App, props }) {
        const root = createRoot(el);

        root.render(
            <StrictMode>
                <App {...props} />x
            </StrictMode>,
        );
    },
    progress: {
        color: '#4B5563',
    },
});

// This will set light / dark mode on load...
initializeTheme();

// Make a new function to render your component upon use
/// NavBar Component
const navbarElement = document.getElementById('top-nav-bar');
if (navbarElement) {
    const navBarRoot = createRoot(navbarElement);
    navBarRoot.render(
        <StrictMode>
            <TopNavBar />
        </StrictMode>,
    );
}

const SlidingImageElements = document.getElementsByName('sliding-images');
for (let i = 0; i < SlidingImageElements.length; i++) {
    createRoot(SlidingImageElements[i]).render(
        <StrictMode>
            <TitlebarImageList />
        </StrictMode>,
    );
}

const SubmitElements = document.getElementsByName('submit-button');
for (let i = 0; i < SubmitElements.length; i++) {
    createRoot(SubmitElements[i]).render(
        <StrictMode>
            <SubmitButton />
        </StrictMode>,
    );
}

const DropDownElements = document.getElementsByName('dropdown');
for (let i = 0; i < DropDownElements.length; i++) {
    createRoot(DropDownElements[i]).render(
        <StrictMode>
            <DropDown />
        </StrictMode>,
    );
}

const HomeIcon = document.getElementsByName('home-icon');
for (let i = 0; i < HomeIcon.length; i++) {
    createRoot(HomeIcon[i]).render(
        <StrictMode>
            <CreateSvgIcon />
        </StrictMode>,
    );
}

const BottomNavBarElement = document.getElementsByName('bottom-nav-bar');
for (let i = 0; i < BottomNavBarElement.length; i++) {
    createRoot(BottomNavBarElement[i]).render(
        <StrictMode>
            <BottomNavBar />
        </StrictMode>,
    );
}

const FileUploadElement = document.getElementsByName('file-upload');
for (let i = 0; i < FileUploadElement.length; i++) {
    createRoot(FileUploadElement[i]).render(
        <StrictMode>
            <FileUpload />
        </StrictMode>,
    );
}

const NotificationIconElement = document.getElementsByName('notification-icon');
for (let i = 0; i < NotificationIconElement.length; i++) {
    createRoot(NotificationIconElement[i]).render(
        <StrictMode>
            <NotificationIcon />
        </StrictMode>,
    );
}
