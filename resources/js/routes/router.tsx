import React from 'react';
import { createBrowserRouter } from 'react-router-dom';

import { HomePage } from '~/pages/home/HomePage';
import { ProfilePage } from '~/pages/profile/ProfilePage';
import { UserPage } from '~/pages/user/UserPage';

export enum AppRoutes {
	HOME = '/',
	PROFILE = '/profile',
	USER_DETAIL = '/user/:id',
}

export const router = createBrowserRouter([
	{
		path: AppRoutes.HOME,
		element: <HomePage />,
	},
	{
		path: AppRoutes.PROFILE,
		element: <ProfilePage />,
	},
	{
		path: AppRoutes.USER_DETAIL,
		element: <UserPage />,
	},
]);
