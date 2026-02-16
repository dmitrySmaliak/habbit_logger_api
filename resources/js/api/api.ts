import axios, { AxiosError, AxiosInstance } from 'axios';

class Api {
	axios: AxiosInstance;

	constructor() {
		this.axios = axios.create({
			baseURL: '/api',
			headers: {
				'Content-Type': 'application/json',
				Accept: 'application/json',
			},
		});

		this.relateAxiosInterceptors();
	}

	relateAxiosInterceptors() {
		this.axios.interceptors.response.use(
			(response) => response,
			async (error) => {
				if (error instanceof AxiosError) {
					const response = error.response;

					switch(Number(response?.status)) {
						case 401:
							return await this.processUnauthorizedResponse(error);
						default:
							return Promise.reject(error);
					}
				}

				return Promise.reject(error);
			}
		);
	}

	private async processUnauthorizedResponse(error: AxiosError) {
		return Promise.reject(error);
	}
}

export default new Api();
