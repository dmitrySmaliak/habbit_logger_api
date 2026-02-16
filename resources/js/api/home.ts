import api from './api';

export class HomeApi {
	static index = async (): Promise<any> => {
		const { data } = await api.axios.get('/home');

		return data;
	};
}
