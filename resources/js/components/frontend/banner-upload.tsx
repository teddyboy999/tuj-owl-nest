import CloudUploadIcon from '@mui/icons-material/CloudUpload';
import Button from '@mui/material/Button';
import { styled } from '@mui/material/styles';
import * as React from 'react';

// Define the interface for the props
interface FileUploadProps {
    onFileSelect: (file: File) => void;
}

const VisuallyHiddenInput = styled('input')({
    clip: 'rect(0 0 0 0)',
    clipPath: 'inset(50%)',
    height: 1,
    overflow: 'hidden',
    position: 'absolute',
    bottom: 0,
    left: 0,
    whiteSpace: 'nowrap',
    width: 1,
});

const FileUpload: React.FC<FileUploadProps> = ({ onFileSelect }) => {
    // This is the specific function that extracts the File object
    const handleFileChange = (event: React.ChangeEvent<HTMLInputElement>) => {
        const files = event.target.files;
        if (files && files.length > 0) {
            // Pass ONLY the first file (File object) to the parent
            onFileSelect(files[0]);
        }
    };

    return (
        <Button
            component="label"
            variant="contained"
            startIcon={<CloudUploadIcon />}
            fullWidth
        >
            Upload Banner Picture
            <VisuallyHiddenInput
                type="file"
                accept="image/*"
                onChange={handleFileChange}
            />
        </Button>
    );
};

export default FileUpload;
