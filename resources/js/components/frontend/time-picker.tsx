import { AdapterDayjs } from '@mui/x-date-pickers/AdapterDayjs';
import { DesktopTimePicker } from '@mui/x-date-pickers/DesktopTimePicker';
import { DemoContainer, DemoItem } from '@mui/x-date-pickers/internals/demo';
import { LocalizationProvider } from '@mui/x-date-pickers/LocalizationProvider';
import dayjs from 'dayjs';

function ResponsiveTimePickers() {
    return (
        <LocalizationProvider dateAdapter={AdapterDayjs}>
            <DemoContainer components={['DesktopTimePicker']}>
                <DemoItem>
                    <DesktopTimePicker
                        defaultValue={dayjs('2022-04-17T15:30')}
                    />
                </DemoItem>
            </DemoContainer>
        </LocalizationProvider>
    );
}

export default ResponsiveTimePickers;
