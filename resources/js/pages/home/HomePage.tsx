import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';

import { HomeApi } from '~/api/home';

import { buildRoute } from '~/helpers/RoutesHelper';

import { AppRoutes } from '~/routes/router';

export const HomePage = () => {
	const [data, setData] = useState('');

	useEffect(() => {
		const fetchData = async () => {
			try {
				const response = await HomeApi.index();

				setData(response.message);
			} catch (error) {
				alert(error);
			}
		};

		fetchData();
	}, []);

	return (
		<div>
			<h1>
				{data}
			</h1>
			<Link to="/profile">To profile</Link>

			<br />
			<Link to={buildRoute(AppRoutes.USER_DETAIL, { id: 1 })}>
                to user id 1
			</Link>
		</div>
	);
};
