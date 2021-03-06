/// Load the React app module. It will take care of most bootstrapping
import app from "mt-react-app";

/// Optionally register additional plugins
/// A plugin is a class implementing a boot method
/// The boot method should accept an app instance as a parameter
/// In order to work with boot flow, the method should return a Promise
//app.register(SomePlugin);


/// Define the services to wrap all pages in
/// It should be a series of react components that all render their children
app.services([
    require("mt-react-resources/src/OperationRepository").default,
    require("mt-react-auth/Service").default,
    require("services/Toastify"),
]);

/// Specify default page template
app.defaultTemplate('Base');

/// Configure which React components to load into the application
/// Only components included in this object, can be added from Laravel Blade views.
/// It should primarily be the main app page components that are included here

import Example from "pages/app/Example";

app.setReactComponents('app', {
    Welcome: Example
});

/// Boot the application
/// It will loop through all applied plugins and load them in order.
/// After booting all plugins, it will listen to a document ready event
/// When the DOM is ready, it will then mount and render all react components present in the DOM
app.run();
