import { AdapterDayjs } from '@mui/x-date-pickers/AdapterDayjs';
import { DesktopTimePicker } from '@mui/x-date-pickers/DesktopTimePicker';
import { DemoContainer, DemoItem } from '@mui/x-date-pickers/internals/demo';
import { LocalizationProvider } from '@mui/x-date-pickers/LocalizationProvider';
import dayjs from 'dayjs';

interface ResponsiveTimePickersProps {
    value: any;
    onChange: (newValue: any) => void;
}

function ResponsiveTimePickers({
    value,
    onChange,
}: ResponsiveTimePickersProps) {
    return (
        <LocalizationProvider dateAdapter={AdapterDayjs}>
            <DemoContainer components={['DesktopTimePicker']}>
                <DemoItem>
                    <DesktopTimePicker
                        defaultValue={dayjs('2022-04-17T15:30')}
                        value={value}
                        onChange={onChange}
                    />
                </DemoItem>
            </DemoContainer>
        </LocalizationProvider>
    );
}

export default ResponsiveTimePickers;
