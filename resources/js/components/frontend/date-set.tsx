import { AdapterDayjs } from '@mui/x-date-pickers/AdapterDayjs';
import { DatePicker } from '@mui/x-date-pickers/DatePicker';
import { DemoContainer } from '@mui/x-date-pickers/internals/demo';
import { LocalizationProvider } from '@mui/x-date-pickers/LocalizationProvider';

interface BasicDatePickerProps {
    value: any;
    onChange: (newValue: any) => void;
}

function BasicDatePicker({ value, onChange }: BasicDatePickerProps) {
    return (
        <LocalizationProvider dateAdapter={AdapterDayjs}>
            <DemoContainer components={['DatePicker']}>
                <DatePicker value={value} onChange={onChange} />
            </DemoContainer>
        </LocalizationProvider>
    );
}

export default BasicDatePicker;
