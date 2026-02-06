import Stack from '@mui/material/Stack';
import { createSvgIcon } from '@mui/material/utils';

const HomeIcon = createSvgIcon(
    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" />,
    'Home',
);

const CreateSvgIcon = () => {
    return (
        <Stack direction="row" spacing={3}>
            <HomeIcon />
            <HomeIcon color="primary" />
        </Stack>
    );
};

export default CreateSvgIcon;
