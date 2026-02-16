export const buildRoute = (route: string, params: Record<string, string | number>) => {
	let builtRoute = route;

	for (const [key, value] of Object.entries(params)) {
		builtRoute = builtRoute.replace(`:${key}`, encodeURIComponent(String(value)));
	}

	return builtRoute;
};
