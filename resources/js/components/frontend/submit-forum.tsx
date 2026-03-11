import { Box } from '@mui/material';
import Button from '@mui/material/Button';
import Popover from '@mui/material/Popover';
import Typography from '@mui/material/Typography';
import * as React from 'react';

export default function BasicPopover() {
    const [anchorEl, setAnchorEl] = React.useState<HTMLButtonElement | null>(
        null,
    );

    const handleClick = (event: React.MouseEvent<HTMLButtonElement>) => {
        setAnchorEl(event.currentTarget);
    };

    const handleClose = () => {
        setAnchorEl(null);
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
                anchorOrigin={{
                    vertical: 'bottom',
                    horizontal: 'left',
                }}
            >
                <Box sx={{ p: 40 }}>
                    <Typography sx={{ position: 'relative', top: '-300px' }}>
                        Title of Post
                    </Typography>
                    <Typography
                        sx={{
                            position: 'relative',
                            top: '-300px',
                            left: '-40px',
                        }}
                    >
                        <input
                            type="text"
                            placeholder="I want to know..."
                        ></input>
                    </Typography>
                </Box>
            </Popover>
        </div>
    );
}
