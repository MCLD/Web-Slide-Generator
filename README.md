## MCLD SlideGen
### Automating web slide creation
### Created by Daniel Messer, Web Content Manager

Assembling web slides takes quite a bit of time, and there are often over 100 slides to make every month. Rather than spend hours in Photoshop, I
decided to create a web app in PHP, leveraging ImageMagick, that builds the slides programmatically.

### Current workflow

**Step 1. index.php**


First thing accessed by the user. Prompts for upload of the image file. Image file should be at least 780 x 175, but this is not enforced by the
code at this time.

---

**Step 2. imgprep.php**


The user will not see this as it happens in the background. The uploaded image is resized to a width of 780, while keeping the aspect ratio
intact. This not only makes cropping easier, but it also allows more of the image to be cropped in the next step.

---

**Step 3. crop.php**

The newly resized image is presented to the user with a simple cropping interface. The initial size of the cropping box is the exact size of the
image header on the slide. Once the crop is selected...

---

**Step 4. eventdata.php**

This is the data entry screen and is the final screen seen by the user. A simple form allows for entry of the event's title, date and time,
branch, and selection of a bar colour. Once complete, the next step is run, and displayed on the right side of the split screen.

---

**Step 5. createslide.php**

The final step and assembly of the elements. This exectutes behind the scenes and won't be seen by the user. The cropped header from step 3 is
combined with the event data into a final slide. This slide is presented on the right side of the eventdata.php screen.

### Credits

MCLD SlideGen contains code and contributions from:

* Start Bootstrap - [Simple Sidebar.](http://startbootstrap.com/template-overviews/simple-sidebar/) Released under an MIT License.
* Deep Liquid - [Jcrop.](http://deepliquid.com/content/Jcrop.html) Released under an MIT License.
* StackOverflow - [PHP Questions.](http://stackoverflow.com/questions/tagged/php) With gratitude.

Coded in PHP. Utilizing ImageMagick.

* [PHP](http://php.net)
* [ImageMagick](http://www.imagemagick.org)
