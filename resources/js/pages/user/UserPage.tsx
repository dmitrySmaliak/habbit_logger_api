import React from 'react';
import { useParams } from 'react-router-dom';

export const UserPage = () => {
	const { id } = useParams<{ id: string }>();

	return (
		<div>
            User id:
			{' '}
			{id}
		</div>
	);
};
