import {
	registerBlockType,
	__,
	InspectorControls,
	BlockControls,
	TextControl,
	PanelBody,
	Fragment,
	ServerSideRender ,
} from '../../wp-imports'

import { GosoIcon } from '../../icons'

 // Rendering in PHP
export const save = ( props ) => { return null }

export const edit = ( props ) => {
	const { isSelected } = props;
	const { postID } = props.attributes;

	 return (
       <Fragment>
       <InspectorControls>
			<PanelBody>
			<TextControl
		      	label={ __( 'Post ID' ) }
		        value={ postID }
		        onChange={ ( postIDValue ) => setAttributes( { postID: postIDValue } ) }
		    />
			</PanelBody>
		</InspectorControls>
        <ServerSideRender
            block="penci-gutenberg/recipe"
            attributes={ props.attributes }
        />
        </Fragment>
    );
}

registerBlockType( 'penci-gutenberg/recipe', {
	title: __( 'Goso: Recipe' ),
	icon: GosoIcon,
	category: 'penci-blocks',
	edit: edit,
	save: save,
} );