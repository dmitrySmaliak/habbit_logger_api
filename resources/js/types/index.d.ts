import ReactDOM from 'react-dom/client';

declare global {
	interface Window {
		__vite_react_root?: ReactDOM.Root;
	}
}
