window.onload = function()
{
	var modals = document.getElementsByClassName('imageModal');
	if (modals.length > 0)
	{
		var imageModal = document.createElement('div');
		var image = document.createElement('img');
		var link = document.createElement('a');
		
		imageModal.setAttribute('id', 'imageModal');
		imageModal.setAttribute('onclick', 'this.style.display=\'none\'');
		image.setAttribute('title', 'Close to close');
		image.setAttribute('alt', 'Click to close');
		link.setAttribute('href', 'javascript:void(0);');
		link.setAttribute('title', 'Close');
		link.innerHTML = 'X';
		
		imageModal.appendChild(image);
		imageModal.appendChild(link);
		document.body.appendChild(imageModal);
		
		for (i = 0;i < modals.length;i++)
		{
			modals[i].onclick = function(e)
			{
				e.preventDefault();
				
				image.src = this.href;
				
				if (this.getAttribute('data-height') < window.innerHeight)
					image.style.top = ((window.innerHeight - this.getAttribute('data-height')) / 2) + 'px';
				else
					image.style.top = '0';
				
				imageModal.style.display = 'block';
			}
		}
		
		window.onresize = function()
		{
			if (imageModal.style.display == 'block')
			{
				if (image.offsetHeight < window.innerHeight)
					image.style.top = ((window.innerHeight - image.offsetHeight) / 2) + 'px';
				else
					image.style.top = '0';
			}
		}
	}
}