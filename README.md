# BerryInfrastructure
A work-in-progress recreation of the BlackBerry Infrastructure.

This project aims to restore functionality to BlackBerry devices and services, such as BBID, BBM, BlackBerry Protect, and more. Feedback and contributions are massively appreciated.

---

## Features

| Feature                 | Status         | Notes                                                              |
|-------------------------|----------------|--------------------------------------------------------------------|
| **SCEP (Certificates?)**| 🔧 In Progress | I'm not entirely sure what's BB10 wants from this endpoint.     |
| **BBID**                | ❌ Not Working | The SCEP system needs figuring out before progress can be made. |
| **BlackBerry Protect**  | ❌ Not Working | Unsure what endpoint BB Protect uses.                           |
| **BBM**                 | ❌ Not Working | BBID needs to be functional first.                              |
| **Setup**               | ✅ Working     | You can setup the device as normal, as the next button appears. |
| **BlackBerry World**    | ❌ Not Working | HTTPS problems (maybe fixable by SCEP?)                         |
| **BlackBerry Link**     | ❌ Not Working | Less dependent on BB servers, but still needs figuring out.     |
| **BlackBerry Blend**    | ❌ Not Working | Seems to be heavily dependent on BB Servers.                    |

---

## Getting Started

1. Clone the repo:
   ```bash
   git clone https://github.com/wumbomumbo/BerryInfrastructure.git
   cd BerryInfrastructure
   ```
2. Install Software:
   You will need some form of PHP and HTTP server, and drop the files in, this should work for either Linux or Windows.

---

## How to use on your BB Devices

There are multiple ways to do this, you could setup your own DNS server and point the BlackBerry URLs to the IP of your server (more on that later).
The way I have been doing it I'll be showcasing here.

1. Install [Fiddler Classic](https://www.telerik.com/download/fiddler):
   Then you will want to go into Tools>Options and go to HTTPS and turn on Decrypt HTTPS traffic. Then you will want to go to Connections on the same Options page, and turn on Allow remote computers to connect. Then restart Fiddler    Classic.
2. Setup your hosts file:
   This is by far the easiest bit, just copy and paste this into your hosts file:
   ```
   127.0.0.1 cse.dcs.blackberry.com
   127.0.0.1 cse.doc.blackberry.com
   127.0.0.1 cs.sl.blackberry.com
   127.0.0.1 appworld.blackberry.com
   127.0.0.1 www.blackberry.com
   127.0.0.1 blackberryid.blackberry.com
   127.0.0.1 pki.services.blackberry.com
   127.0.0.1 inet.registration.blackberry.com
   127.0.0.1 eph421.blackberry.com
   127.0.0.1 c3031d200f875b823380a522a2001a0c08a23730.navbuilder.nimlbs.net
   127.0.0.1 8e4ef5e34fddbbdae956a8bdf336a1bc3baa0386.navbuilder.nimlbs.net
   ```
3. Connect to the proxy server on your BB Device:
   You can manually specify your IP when you check the Use Proxy box, if you don't know how to get the IP, [google it](https://www.google.com/search?q=how+to+get+local+ip).
   Also for good measure if you can, please try and install the Fiddler Certificate or the certificate you've created.
4. See if it works:
   If you've done everything correctly, you should be able to use the available features listed working in the table!

### Note: Sometimes when setting up your BB Device, it can "forget" the proxy and you may have to set it again.
