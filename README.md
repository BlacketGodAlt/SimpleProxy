# SimpleProxy
SimpleProxy is a blazing fast proxy revolutionizing the website access industry - all with one file.

## Deployment
#### Github Codespaces
1. Click the green `Code` button, select `Codespaces`, and select `Create Codespace on main`.
2. After the codespace loads, enter the terminal and copy & paste or type this code: `php -S 0.0.0.0:8000`.
3. If you need to, click the **Enter** key on your keyboard.
4. A popup should appear. Click on the button that says `Make Public`.
5. Navigate to the `Ports` tab, right-click the link, and click `Open in Browser`.
6. Congrats! The proxy should now be running!

#### Local deployment
Requirements:
`PHP`

Steps:
1. Click the green `Code` button and select `Download as ZIP`.
2. Extract the folder containing the file from the ZIP file.
3. Open your terminal and navigate to the directory using the `cd` command. If you're unsure how to do this, there are many YouTube tutorials about it.
4. Type or copy & paste `php -S localhost:8000`.
5. Paste `http://localhost:8000/proxy.php?url=ADD-A-URL-HERE` into your browser, and replace `ADD-A-URL-HERE` with the website you want to visit.
6. Congrats! You've locally deployed this proxy to your computer!
