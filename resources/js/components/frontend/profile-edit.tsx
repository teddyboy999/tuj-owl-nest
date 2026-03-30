import CloseIcon from '@mui/icons-material/Close';
import { Box, IconButton, TextField } from '@mui/material';
import Button from '@mui/material/Button';
import Popover from '@mui/material/Popover';
import Typography from '@mui/material/Typography';
import axios from 'axios';
import * as React from 'react';
import { useState } from 'react';
import FileUpload from './file-upload';

function BasicPopover() {
    const [profileImage, setProfileImage] = useState<File | null>(null);
    const [previewUrl, setPreviewUrl] = useState<string | null>(null);

    const handleFileSelect = (file: File) => {
        if (!file) {
            console.error('No file received');
            return;
        }
        setProfileImage(file);
        try {
            const url = URL.createObjectURL(file);
            setPreviewUrl(url);
        } catch (err) {
            console.error('Error creating preview URL:', err);
        }
    };

    const handleRemoveImage = () => {
        setProfileImage(null);
        // Important: Revoke the URL to free up memory
        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
        }
        setPreviewUrl(null);
    };

    const [anchorEl, setAnchorEl] = React.useState<HTMLButtonElement | null>(
        null,
    );

    const [formData, setFormData] = useState({
        bioContent: '',
        userYear: '',
        userMajor: '',
        userAge: '',
    });

    const handleSubmit = async (event: React.FormEvent) => {
        event.preventDefault();

        // Note for Alonzo: Figure out how to insert Social Media links into images :)
        const data = new FormData();
        data.append('bioContent', formData.bioContent);
        data.append('userYear', formData.userYear);
        data.append('userMajor', formData.userMajor);
        data.append('userAge', formData.userAge);

        if (profileImage) {
            data.append('profile_picture', profileImage);
        }

        try {
            const response = await axios.post('/profile-add', data);

            if (response.status === 201 || response.status === 200) {
                handleClose();
                window.location.reload();
            }
        } catch (error) {
            console.error('Error uploading', error);
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
                Edit Profile
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
                        <Typography variant="subtitle2">Bio</Typography>
                        <TextField
                            multiline
                            name="bioContent"
                            value={formData.bioContent}
                            onChange={handleChange}
                            rows={4}
                            fullWidth
                            placeholder="Write about you!"
                            sx={{ backgroundColor: 'rgb(235, 235, 235)' }}
                        />
                    </Box>
                    <Box>
                        <Typography variant="subtitle2">Year</Typography>
                        <TextField
                            name="userYear"
                            value={formData.userYear}
                            onChange={handleChange}
                            placeholder="1st Year, 2nd Year..."
                        />
                    </Box>
                    <Box>
                        <Typography variant="subtitle2">Major</Typography>
                        <TextField
                            name="userMajor"
                            value={formData.userMajor}
                            onChange={handleChange}
                            placeholder="eg. Computer Science"
                        />
                    </Box>
                    <Box>
                        <Typography variant="subtitle2">Age</Typography>
                        <TextField
                            name="userAge"
                            value={formData.userAge}
                            onChange={handleChange}
                            placeholder="eg. 21"
                        />
                    </Box>
                    <Box>
                        <Typography variant="subtitle2">
                            Profile Pic Upload
                        </Typography>
                        {previewUrl && (
                            <Box sx={{ mt: 1, mb: 1, textAlign: 'center' }}>
                                <img
                                    src={previewUrl}
                                    alt="Preview"
                                    style={{
                                        width: '80px',
                                        height: '80px',
                                        borderRadius: '50%',
                                        objectFit: 'cover',
                                        border: '2px solid white',
                                    }}
                                />

                                <IconButton
                                    onClick={handleRemoveImage}
                                    size="small"
                                    sx={{
                                        backgroundColor:
                                            'rgba(255, 255, 255, 0.7)',
                                        color: '#9d2235', // Temple Red
                                        '&:hover': {
                                            backgroundColor: 'white',
                                        },
                                    }}
                                >
                                    <CloseIcon fontSize="small" />
                                </IconButton>
                            </Box>
                        )}
                        <FileUpload onFileSelect={handleFileSelect} />
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
