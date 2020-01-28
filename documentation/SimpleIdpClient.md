# SimpleIdpClient
This Class will help you to authenticate at the d.ecs identity provider.

## __construct(string $baseUrl): void
The constructor takes the d.ecs http gateway base url as parameter.

``$idpClient = new SimpleIdpClient("https://d3one.demo.local");``

## loginUrl(string $redirect) : string
Get an url to automatically sign in the user and return to the site ``$redirect``.

## tokenExists() : bool
Check if ANY Token was sent from the client.

## validateToken() : bool
Validate if an VALID token was sent from client.

## Todo
- Implement methods for the two SCIM methods users and groups
- Return SCIM model of user at validation
