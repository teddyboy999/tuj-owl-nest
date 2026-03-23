import CloseIcon from '@mui/icons-material/Close';
import { Box, Chip, IconButton, TextField } from '@mui/material';
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

    const [tags, setTags] = useState<string[]>(['Test']);
    const [currValue, setCurrValue] = useState('');

    const [formData, setFormData] = useState({
        forumTitle: '',
        description: '',
    });

    const handleSubmit = async (event: { preventDefault: () => void }) => {
        event.preventDefault();

        const submissionData = {
            post_title: formData.forumTitle,
            post_content: formData.description,
            tags: tags,
        };

        try {
            const response = await axios.post('/forum-add', submissionData);

            if (response.status === 201 || response.status === 200) {
                alert('Forum post created!');
                handleClose();
            }
        } catch (error) {
            const axiosError = error as any;
            console.log('Error', axiosError?.response.data);
        }
    };
    const handleClick = (event: React.MouseEvent<HTMLButtonElement>) => {
        setAnchorEl(event.currentTarget);
    };

    const handleClose = () => {
        setAnchorEl(null);
    };

    const handleKeyUp = (e: React.KeyboardEvent) => {
        if (e.key === 'Enter' && currValue.trim() !== '') {
            setTags([...tags, currValue.trim()]);
            setCurrValue('');
        }
    };

    const handleDelete = (tagToDelete: string) => {
        setTags((chips) => chips.filter((chip) => chip !== tagToDelete));
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
                Create New Forum
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
                        <Typography variant="h6">Title of Post</Typography>
                        <TextField
                            fullWidth
                            name="forumTitle"
                            value={formData.forumTitle}
                            onChange={handleChange}
                            size="small"
                            placeholder="I want to know..."
                            style={{ backgroundColor: 'rgb(235, 235, 235)' }}
                        />
                    </Box>
                    <Box>
                        <Typography variant="subtitle2">Tags</Typography>
                        <Box
                            sx={{
                                display: 'flex',
                                flexWrap: 'wrap',
                                bgcolor: 'rgb(235, 235, 235}',
                                borderRadius: 1,
                                gap: 1,
                                minHeight: '32px',
                            }}
                        >
                            {tags.map((tag) => (
                                <Chip
                                    key={tag}
                                    label={tag}
                                    onDelete={() => handleDelete(tag)}
                                    size="small"
                                    color="primary"
                                />
                            ))}
                            <input
                                value={currValue}
                                onChange={(e) => setCurrValue(e.target.value)}
                                onKeyUp={handleKeyUp}
                                placeholder="Add Tag"
                                style={{
                                    border: 'none',
                                    outline: 'none',
                                    backgroundColor: 'whitesmoke',
                                    flexGrow: 1,
                                    width: '100%',
                                    padding: '8px',
                                }}
                            />
                        </Box>
                    </Box>
                    <Box>
                        <Typography variant="subtitle2">Message</Typography>
                        <TextField
                            multiline
                            name="description"
                            value={formData.description}
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
