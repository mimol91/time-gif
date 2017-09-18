# PHP endless time GIF
This application display current UTF time as a gif. 
Animation never ends, because in each second new frame is generated and then thanks to HTTP connection it is streamed to client.


### References
* [Time.gif in Haskell](https://hookrace.net/blog/time.gif)
* [What's In A GIF](http://www.matthewflickinger.com/lab/whatsinagif/bits_and_bytes.asp)

## Getting Started

This project display endless GIF with current UTC time.

### Prerequisites

* PHP 7
* GD library
* Composer

### Installing
Run `composer dump-autoload -o`, to generate autoload files.

### Running
You can use any web server (apache/nginx) to run web server, or just simply type `php -S localhost` to start PHP web server:80.

After that navigate to `http://localhost` to see it in action.

### Screenshot
![PHP endless time gif](https://github.com/mimol91/time-gif/blob/master/screenshot.gif)

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.


## Authors

* **Adam Szaraniec** - *Project Demo* - [mimol91](https://github.com/mimol91)

See also the list of [contributors](https://github.com/mimol91/time-gif/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
