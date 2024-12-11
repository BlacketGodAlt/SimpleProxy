# SimpleProxy
A very simple proxy.

This proxy is very easy to use and easy to setup.
(This proxy is in BETA testing. Some images may not load when using the proxy.)

# Steps to launch:
1. Create a new codespace
2. Launch the codespace
3. Enter the command `sudo apt update` in the terminal
4. Wait for the download to finish
5. Enter the command `sudo apt install -y php`
6. Wait for the download to finish
7. Run the command `php -S 0.0.0.0:8000`
8. A tab should pop up saying **Your application is running on port 8000.** Click the **Make public** button on the popup.
9. Navigate to the **Ports** tab, right click the forwarded address, and click "Open in browser".
10. Your proxy should now have launched!
