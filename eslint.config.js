import js from '@eslint/js';
import tseslint from '@typescript-eslint/eslint-plugin';
import parserTypeScript from '@typescript-eslint/parser';
import react from 'eslint-plugin-react';
import reactHooks from 'eslint-plugin-react-hooks';
import reactCompiler from 'eslint-plugin-react-compiler';
import simpleImportSort from 'eslint-plugin-simple-import-sort';

export default [
	{
        files: ['resources/js/**/*.{js,jsx,ts,tsx}'],
		languageOptions: {
			parser: parserTypeScript,
			ecmaVersion: 'latest',
			sourceType: 'module',
            globals: {
                document: 'readonly',
                window: 'readonly',
                console: 'readonly',
                alert: 'readonly',
            },
		},
		plugins: {
			'react': react,
			'react-hooks': reactHooks,
			'react-compiler': reactCompiler,
			'simple-import-sort': simpleImportSort,
			'@typescript-eslint': tseslint,
		},
        settings: {
            react: {
                version: 'detect',
            },
        },
		...js.configs.recommended,
		rules: {
			...react.configs.recommended.rules,
			...reactHooks.configs.recommended.rules,
			...tseslint.configs.recommended.rules,

			'react-compiler/react-compiler': 'error',
			'no-console': 'error',
			'indent': ['error', 'tab', { SwitchCase: 1 }],
			'linebreak-style': ['error', 'unix'],
			'quotes': ['error', 'single'],
			'semi': ['error', 'always'],
			'max-len': ['error', 120, 2, {
				ignoreUrls: true,
				ignoreComments: false,
				ignoreRegExpLiterals: false,
				ignoreStrings: true,
				ignoreTemplateLiterals: false
			}],
			'object-curly-spacing': ['error', 'always'],
			'no-trailing-spaces': ['error', { skipBlankLines: false, ignoreComments: false }],
			'no-multiple-empty-lines': ['error', { max: 1, maxEOF: 0, maxBOF: 0 }],
			'comma-spacing': ['error', { before: false, after: true }],
			'padding-line-between-statements': [
				'error',
				{ blankLine: 'always', prev: ['const', 'let', 'var'], next: '*' },
				{ blankLine: 'any', prev: ['const', 'let', 'var'], next: ['const', 'let', 'var'] },
				{ blankLine: 'never', prev: 'import', next: 'import' },
				{ blankLine: 'always', prev: 'import', next: '*' },
				{ blankLine: 'any', prev: 'import', next: 'import' },
				{ blankLine: 'always', prev: '*', next: 'block-like' },
				{ blankLine: 'always', prev: 'block-like', next: '*' }
			],
			'@typescript-eslint/no-explicit-any': 'warn',
			'no-undef': ['error', { typeof: true }],
			'no-prototype-builtins': 'error',
			'no-unsafe-optional-chaining': 'error',
			'no-case-declarations': 'off',
			'no-extra-boolean-cast': 'off',
			'react-hooks/rules-of-hooks': 'error',
			'react-hooks/exhaustive-deps': 'warn',
			'simple-import-sort/exports': 'error',
			'simple-import-sort/imports': ['error', {
				groups: [
					['^react'],
					['^@?\\w'],
					['^\\u0000'],
					['^(?!@).*api.*$'],
					['^(?!@).*assets.*$'],
					['^\\.(?!@).*components.*$'],
					['^(?!@).*configs.*$'],
					['^(?!@).*helpers.*$'],
					['^(?!@).*hooks.*$'],
					['^(?!@).*redux.*$'],
					['^(?!@).*pages.*$'],
					['^(?!@).*types.*$'],
					['^(?!@).*utils.*$'],
					['^\\./(?=.*/)(?!/?$)', '^\\.\\.(?!/?$)', '^\\.\\./?$'],
					['.*partials.*', '^\\.(?!/?$)', '^\\./?$'],
					['.*css$']
				]
			}],
			'react/jsx-sort-props': ['error', {
				shorthandFirst: true,
				noSortAlphabetically: true,
				callbacksLast: true,
				reservedFirst: true,
				ignoreCase: true
			}],
			'react/self-closing-comp': 'error',
			'react/jsx-closing-tag-location': 'error',
			'import/prefer-default-export': 'off',
			'@typescript-eslint/no-unused-vars': 'error',
			'@typescript-eslint/no-empty-interface': 'off',
			'@typescript-eslint/no-empty-function': 'error',
			'no-empty-function': ['error', { allow: ['arrowFunctions'] }],
			'react/function-component-definition': ['error', {
				namedComponents: 'arrow-function',
				unnamedComponents: 'arrow-function'
			}],
			'curly': ['error', 'all'],
			'operator-linebreak': ['error', 'before'],
			'implicit-arrow-linebreak': 'off',
			'no-duplicate-imports': ['error'],
			'react/jsx-pascal-case': 'error',
			'react/jsx-one-expression-per-line': ['error', { allow: 'literal' }],
			'react/jsx-closing-bracket-location': ['error', 'tag-aligned'],
			'react/jsx-max-props-per-line': ['error', { maximum: 1, when: 'always' }],
			'react/jsx-first-prop-new-line': ['error', 'multiline-multiprop'],
			'react/jsx-curly-spacing': ['error'],
			'react/jsx-equals-spacing': ['error', 'never'],
			'react/jsx-wrap-multilines': ['error', {
				declaration: 'parens-new-line',
				assignment: 'parens-new-line',
				return: 'parens-new-line',
				arrow: 'parens-new-line',
				condition: 'parens-new-line',
				logical: 'parens-new-line',
				prop: 'parens-new-line'
			}],
			'react/jsx-tag-spacing': ['error', {
				closingSlash: 'never',
				beforeSelfClosing: 'always',
				afterOpening: 'never'
			}],
			'react/jsx-props-no-multi-spaces': 'error',
			'jsx-quotes': ['error', 'prefer-double']
		}
	}
];
