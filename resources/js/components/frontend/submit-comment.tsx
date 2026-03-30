import CloseIcon from '@mui/icons-material/Close';
import { Box, IconButton, TextField } from '@mui/material';
import Button from '@mui/material/Button';
import Popover from '@mui/material/Popover';
import Typography from '@mui/material/Typography';
import axios from 'axios';
import * as React from 'react';
import { useState } from 'react';

function BasicPopover() {
    const [anchorEl, setAnchorEl] = React.useState<HTMLButtonElement | null>(
        null,
    );

    const [formData, setFormData] = useState({
        postContent: '',
    });

    const handleSubmit = async (event: { preventDefault: () => void }) => {
        event.preventDefault();

        const rootElement = document.getElementById('create-comment-root');
        const forumId = rootElement
            ? rootElement.getAttribute('data-forum-id')
            : null;

        const submissionData = {
            post_content: formData.postContent,
            parent_forum_id: forumId,
        };

        try {
            const response = await axios.post('/comment-add', submissionData);

            if (response.status === 201 || response.status === 200) {
                handleClose();
                window.location.reload();
            }
        } catch (error) {
            const axiosError = error as any;
            if (axiosError.response?.data.message === 'Unauthenticated.') {
                alert('Not autheniticated. Please login to post a reply.');
            } else {
                alert('Not autheniticated, Please login to post a reply');
                // For some reason it's catching a seperate error, so we'll handle with a seperate alert
            }
            console.log('Error', axiosError?.response.data);
        }
    };
    const handleClick = (event: React.MouseEvent<HTMLButtonElement>) => {
        setAnchorEl(event.currentTarget);
    };

    const handleClose = () => {
        setAnchorEl(null);
    };

    const handleChange = (event: { target: { name: any; value: any } }) => {
        setFormData({ ...formData, [event.target.name]: event.target.value });
    };

    const open = Boolean(anchorEl);
    const id = open ? 'simple-popover' : undefined;

    return (
        <div>
            <Button
                aria-describedby={id}
                variant="contained"
                onClick={handleClick}
            >
                Comment
            </Button>
            <Popover
                id={id}
                open={open}
                anchorEl={anchorEl}
                onClose={handleClose}
                disableScrollLock={true}
                anchorOrigin={{
                    vertical: 'bottom',
                    horizontal: 'left',
                }}
            >
                <Box
                    component="form"
                    onSubmit={handleSubmit}
                    sx={{
                        p: 3,
                        backgroundColor: 'rgb(230, 219, 171)',
                        display: 'flex',
                        flexDirection: 'column',
                        gap: 1,
                    }}
                >
                    <IconButton
                        onClick={handleClose}
                        sx={{ position: 'absolute', top: 8, right: 8 }}
                    >
                        <CloseIcon />
                    </IconButton>
                    <Box>
                        <Typography variant="subtitle2">Comment</Typography>
                        <TextField
                            multiline
                            name="postContent"
                            value={formData.postContent}
                            onChange={handleChange}
                            rows={4}
                            fullWidth
                            placeholder="Write whats on your mind"
                            sx={{ backgroundColor: 'rgb(235, 235, 235)' }}
                        />
                    </Box>

                    <Box>
                        <Button type="submit" variant="contained" fullWidth>
                            Submit
                        </Button>
                    </Box>
                </Box>
            </Popover>
        </div>
    );
}

export default BasicPopover;
