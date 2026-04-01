import '../css/app.css';
//import './bootstrap';

import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { StrictMode } from 'react';
import { createRoot } from 'react-dom/client';

import { initializeTheme } from './hooks/use-appearance';

// Import your component
import BannerUpload from './components/frontend/banner-upload';
import BottomNavBar from './components/frontend/bottom-bar';
import ContactDropDown from './components/frontend/contact-dropdown';
import DatePick from './components/frontend/date-set';
import DropDown from './components/frontend/dropdown-function';
import FileUpload from './components/frontend/file-upload';
import CreateSvgIcon from './components/frontend/home-icon';
import LogoUpload from './components/frontend/logo-upload';
import NotificationIcon from './components/frontend/notification-icon';
import ProfileEdit from './components/frontend/profile-edit';
import TitlebarImageList from './components/frontend/sliding-images';
import SubmitButton from './components/frontend/submit-button';
import CreateComment from './components/frontend/submit-comment';
import CreateEvent from './components/frontend/submit-event';
import CreateForum from './components/frontend/submit-forum';
import CreatePost from './components/frontend/submit-post';
import TimePicker from './components/frontend/time-picker';
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
                <App {...props} />
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
            <DropDown
                onChange={function (selectedValue: string): void {
                    throw new Error('Function not implemented.');
                }}
            />
        </StrictMode>,
    );
}

const ContactDropDownElements = document.getElementsByName('contact-dropdown');
for (let i = 0; i < ContactDropDownElements.length; i++) {
    createRoot(ContactDropDownElements[i]).render(
        <StrictMode>
            <ContactDropDown />
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

const CreateForumElement = document.getElementsByName('create-forum');
for (let i = 0; i < CreateForumElement.length; i++) {
    createRoot(CreateForumElement[i]).render(
        <StrictMode>
            <CreateForum />
        </StrictMode>,
    );
}

const CreateEventElement = document.getElementsByName('create-event');
for (let i = 0; i < CreateEventElement.length; i++) {
    createRoot(CreateEventElement[i]).render(
        <StrictMode>
            <CreateEvent />
        </StrictMode>,
    );
}

const CreatePostElement = document.getElementsByName('create-post');
for (let i = 0; i < CreatePostElement.length; i++) {
    createRoot(CreatePostElement[i]).render(
        <StrictMode>
            <CreatePost />
        </StrictMode>,
    );
}

const CreateCommentElement = document.getElementsByName('create-comment');
for (let i = 0; i < CreateCommentElement.length; i++) {
    createRoot(CreateCommentElement[i]).render(
        <StrictMode>
            <CreateComment />
        </StrictMode>,
    );
}

const ProfileEditElement = document.getElementsByName('profile-edit');
for (let i = 0; i < ProfileEditElement.length; i++) {
    createRoot(ProfileEditElement[i]).render(
        <StrictMode>
            <ProfileEdit />
        </StrictMode>,
    );
}

const DateSetElement = document.getElementsByName('date-set');
for (let i = 0; i < DateSetElement.length; i++) {
    createRoot(DateSetElement[i]).render(
        <StrictMode>
            <DatePick
                value={undefined}
                onChange={function (newValue: any): void {
                    throw new Error('Function not implemented.');
                }}
            />
        </StrictMode>,
    );
}

const TimeSetElement = document.getElementsByName('time-set');
for (let i = 0; i < TimeSetElement.length; i++) {
    createRoot(TimeSetElement[i]).render(
        <StrictMode>
            <TimePicker
                value={undefined}
                onChange={function (newValue: any): void {
                    throw new Error('Function not implemented.');
                }}
            />
        </StrictMode>,
    );
}

const BannerUploadElement = document.getElementsByName('banner-upload');
for (let i = 0; i < BannerUploadElement.length; i++) {
    createRoot(BannerUploadElement[i]).render(
        <StrictMode>
            <BannerUpload />
        </StrictMode>,
    );
}

const LogoUploadElement = document.getElementsByName('logo-upload');
for (let i = 0; i < LogoUploadElement.length; i++) {
    createRoot(LogoUploadElement[i]).render(
        <StrictMode>
            <LogoUpload />
        </StrictMode>,
    );
}
