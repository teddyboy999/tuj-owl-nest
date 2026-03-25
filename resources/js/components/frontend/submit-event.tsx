import CloseIcon from '@mui/icons-material/Close';
import { Box, Chip, IconButton, TextField } from '@mui/material';
import Button from '@mui/material/Button';
import Popover from '@mui/material/Popover';
import Typography from '@mui/material/Typography';
import axios from 'axios';
import * as React from 'react';
import { useState } from 'react';
import BasicDatePicker from './date-set';
import DropDown from './dropdown-function';
import ResponsiveTimePickers from './time-picker';

function BasicPopover() {
    const [anchorEl, setAnchorEl] = React.useState<HTMLButtonElement | null>(
        null,
    );

    const [tags, setTags] = useState<string[]>(['Test']);
    const [currValue, setCurrValue] = useState('');

    const [formData, setFormData] = useState({
        eventName: '',
        event_organizer: '',
        event_email: '',
        description: '',
    });
    const [affiliation, setAffiliation] = useState('');
    const [eventDate, setEventDate] = useState<any>(null);
    const [startTime, setStartTime] = useState<any>(null);
    const [endTime, setEndTime] = useState<any>(null);

    const handleSubmit = async (event: { preventDefault: () => void }) => {
        event.preventDefault();

        const submissionData = {
            eventName: formData.eventName,
            event_organizer: formData.event_organizer,
            event_email: formData.event_email,
            description: formData.description,
            affiliation: affiliation,
            tags: tags,
            eventDate: eventDate?.format('YYYY-MM-DD'),
            startTime: startTime?.format('HH:mm:ss'),
            endTime: endTime?.format('HH:mm:ss'),
        };
        try {
            const response = await axios.post('/event-add', submissionData);

            if (response.status === 200 || response.status === 201) {
                handleClose();
                window.location.reload();
            }
        } catch (error) {
            const axiosError = error as any;
            if (axiosError.response?.data.message === 'Unauthenticated.') {
                alert('Not autheniticated. Please login to create an event.');
            }

            console.log('Error', axiosError.response?.data);
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
                Create New Event
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
                        p: 2,
                        width: '550px',
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
                        <Typography variant="h6" fontWeight={'bold'}>
                            Title of Event
                        </Typography>
                        <TextField
                            fullWidth
                            name="eventName"
                            value={formData.eventName}
                            onChange={handleChange}
                            size="small"
                            placeholder="Event Name"
                            style={{ backgroundColor: 'rgb(235, 235, 235)' }}
                        />
                    </Box>
                    <Box>
                        <Typography variant="h6" fontWeight={'bold'}>
                            Organizer
                        </Typography>
                        <TextField
                            fullWidth
                            name="event_organizer"
                            value={formData.event_organizer}
                            onChange={handleChange}
                            size="small"
                            placeholder="John Smith"
                            style={{ backgroundColor: 'rgb(235, 235, 235)' }}
                        />
                    </Box>
                    <Box>
                        <Typography variant="h6" fontWeight={'bold'}>
                            Email
                        </Typography>
                        <TextField
                            fullWidth
                            name="event_email"
                            value={formData.event_email}
                            onChange={handleChange}
                            size="small"
                            placeholder="tus52183@temple.edu"
                            style={{ backgroundColor: 'rgb(235, 235, 235)' }}
                        />
                    </Box>
                    <Box>
                        <Typography variant="subtitle2" fontWeight={'bold'}>
                            Affiliation
                        </Typography>
                        <DropDown onChange={(value) => setAffiliation(value)} />
                    </Box>
                    <Box>
                        <Typography variant="subtitle2" fontWeight={'bold'}>
                            Tags
                        </Typography>
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
                        <Typography variant="subtitle2" fontWeight={'bold'}>
                            Description
                        </Typography>
                        <TextField
                            name="description"
                            value={formData.description}
                            onChange={handleChange}
                            multiline
                            rows={4}
                            fullWidth
                            placeholder="Whats going on"
                            sx={{ backgroundColor: 'rgb(235, 235, 235)' }}
                        />
                    </Box>
                    <Box>
                        <Typography variant="subtitle2" fontWeight={'bold'}>
                            Event Date
                        </Typography>
                        <BasicDatePicker
                            value={eventDate}
                            onChange={(newValue) => setEventDate(newValue)}
                        />
                    </Box>

                    <Box
                        sx={{
                            display: 'flex',
                            gap: 4,
                            alignItems: 'flex-start',
                        }}
                    >
                        <Box
                            sx={{
                                display: 'flex',
                                flexDirection: 'column',
                                gap: 1,
                            }}
                        >
                            <Typography variant="subtitle2" fontWeight="bold">
                                Event Start Time
                            </Typography>
                            <ResponsiveTimePickers
                                value={startTime}
                                onChange={(newValue) => setStartTime(newValue)}
                            />
                        </Box>
                        <Box
                            sx={{
                                display: 'flex',
                                flexDirection: 'column',
                                gap: 1,
                            }}
                        >
                            <Typography variant="subtitle2" fontWeight="bold">
                                Event End Time
                            </Typography>
                            <ResponsiveTimePickers
                                value={endTime}
                                onChange={(newValue) => setEndTime(newValue)}
                            />
                        </Box>
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
