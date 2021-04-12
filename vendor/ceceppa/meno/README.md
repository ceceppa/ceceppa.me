# Meno

Prevents WordPress from polluting your upload folder with big images and countless resized versions.

WordPress generates, by default, three resized version for each image uploaded. On top of that
creates additional ones for each custom image size defined using `add_image_size`. 
All of that regardless of the fact that the image size is used or not!

**Also, WordPress does allow a user to upload and use huge images**

So, this leads quickly to a huge upload folder, even for a quite small website.

Meno prevents WordPress from creating any resized version unless you need it!
It also prevents users from uploading and using **huge** images.

### Example

Suppose we define two new image sizes called `home-tile` and `full-width`:

```php
add_image_size( 'home-tile', 450, 253, true );
add_image_size( 'full-width', 1440, 810, true );
```

Using this class, when the user uploads an image, the upload folder will look like:

```
|- example.jpg
|- example.jpg.original*
```

Nothing than the original image is there!

#### The .original file

We know, users like to use huge images, sometimes more than 1Mb.
So, anytime a user uploaded an image bigger than that, Meno will resize it using a
defined `MAX_WIDTH` and `MAX_HEIGHT`.

By default the max size defined is `1920x1080`, you can override this by defining:

```php
define( 'MENO_MAX_WIDTH', ...);
define( 'MENO_MAX_HEIGHT', ...);
```

### Habemus resized version

So, when does a resized version is created?

Simple, when it's used, for example:

```php
the_post_thumbnail( 'home-tile' )
```

In this case, and only this case, Meno will check if the `450x253` size exists,
and if not, it will generate it on the fly!

## How meno is different from other solutions?

Beside Meno, we have two options to prevent the issue:

- Re-define the size of thumbnail and medium sizes
- Use Image Optimizer plugins

### The re-defining issue

I do personally don't like this option at all! Because even changing the default sizes for
**thumbnail** and **medium**, those names don't make sense to me. Because on some
website I might have/need thumbnails with a different ratio. And, for me, **medium** is too generic
doesn't mean anything specific!
And I prefer my naming for the image sizes.

### Image Optimizer

There are several plugins to do the job, and all of them will optimise the main image and
the resized ones, to reduce the size of the upload folder.

They work quite well, but have the same issue: all the resized versions are generated
regardless of the fact that you use them or not!

## Getting Started

### Installing

### Manually

Download the repository and load the `meno.php` file within your theme or plugin.

### Composer

```
composer require ceceppa/meno --dev
```

### Usage

```php
prevent_generation();
```

## Running the tests

To run all replace your database info inside the `run-tests.sh` file first.

To set up and installs the WordPress testing library first and run all the tests:

```
composer test
```

To run the PHPUnit tests only:

```
composer phpunit
```

To analyse the code quality:

```
composer phpinsights
```

## Deployment

WordPress coding standards are used with few exceptions.


## BUGS

At the moment in Gutengerg you can only choose the `Large` size.

### TODO

- [ ] Allow user to choose different image sizes in Gutenberg

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Authors

- **Alessandro Senese** - _Initial work_ - [Ceceppa](htts://ceceppa.me)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
