import Button from '@mui/material/Button';
import Stack from '@mui/material/Stack';

const SubmitButton = () => {
    return (
        <Stack direction="row" spacing={2}>
            <Button variant="outlined">Submit</Button>
            <Button variant="outlined" disabled>
                Disabled
            </Button>
        </Stack>
    );
};

export default SubmitButton;
