# BerryInfrastructure
A work-in-progress recreation of the BlackBerry Infrastructure.

This project aims to restore functionality to BlackBerry devices and services, such as BBID, BBM, BlackBerry Protect, and more. Feedback and contributions are massively appreciated.

---

## Features

| Feature                 | Status         | Notes                                                              |
|-------------------------|----------------|--------------------------------------------------------------------|
| **SCEP (Certificates?)**| 🔧 In Progress | I'm not entirely sure what's BB10 wants from this endpoint.     |
| **BBID**                | ❌ Not Started | The SCEP system needs figuring out before progress can be made. |
| **BlackBerry Protect**  | ❌ Not Started | Unsure what endpoint BB Protect uses.                           |
| **BBM**                 | ❌ Not Started | BBID needs to be functional first.                              |
| **Setup**               | ✅ Working     | You can setup the device as normal, as the next button appears. |
| **BlackBerry World**    | ❌ Not Started | HTTPS problems (maybe fixable by SCEP?)                         |

---

## Getting Started

1. Clone the repo:
   ```bash
   git clone https://github.com/saulcheeseman/BerryInfrastructure.git
   cd BerryInfrastructure
   ```
2. Install Software:
   You will need some form of PHP and HTTP server, and drop the files in, this should work for either Linux or Windows.

---

## How to use on your BB Devices

There are multiple ways to do this, you could setup your own DNS server and point the BlackBerry URLs to the IP of your server (more on that later).
The way I have been doing it I'll be showcasing here.

1. Install [Fiddler Classic](https://www.telerik.com/download/fiddler):
   Then you will want to go into Tools>Options and go to HTTPS and turn on Decrypt HTTPS traffic. Then you will want to go to Connections on the same Options page, and turn on Allow remote computers to connect. Then restart Fiddler Classic.
2. Connect to the proxy server on your BB Device:
   You can manually specify your IP when you check the Use Proxy box, if you don't know how to get the IP, [google it](https://www.google.com/search?q=how+to+get+local+ip).
3. See if it works:
   If you've done everything correctly, you should be able to use the available features listed working in the table!
