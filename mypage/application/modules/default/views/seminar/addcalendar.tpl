BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
CALSCALE:GREGORIAN
BEGIN:VEVENT
UID:{$uid}
DTSTAMP:{$datetime}
DTSTART:{$datestart}
DTEND:{$dateend}
SUMMARY:{$summary}
LOCATION:{$address}
DESCRIPTION:{$description}
URL;VALUE=URI:{$url}
END:VEVENT
END:VCALENDAR