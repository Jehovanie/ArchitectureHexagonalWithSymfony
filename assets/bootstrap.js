import { startStimulusApp } from '@symfony/stimulus-bundle';

const app = startStimulusApp();
// register any custom, 3rd party controllers here
// app.register('some_controller_name', SomeImportedController);

			var win = navigator.platform.indexOf("Win") > -1;
			if (win && document.querySelector("#sidenav-scrollbar")) {
				var options = {
					damping: "0.5",
				};
				Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
			}