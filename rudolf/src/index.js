const { registerBlockType } = wp.blocks;

const {
	RichText,
	InspectorControls,
	ColorPalette,
	MediaUpload,
	InnerBlocks,
	BlockControls,
	AlignmentToolbar,
} = wp.blockEditor;

const ALLOWED_BLOCKS = ["core/image"];

const { PanelBody, IconButton, RangeControl } = wp.components;

registerBlockType("joey-jay-digital/custom-card", {
	// built-in attributes
	title: "Custom Card",
	description: "Create your own simple card with image and text",
	icon: "cover-image",
	category: "design",

	// custom attributes
	attributes: {

		title: {
			type: "string",
			source: "html",
			selector: "h2",
		},
		titleColor: {
			type: "string",
			default: "#222",
		},

		body: {
			type: "string",
			source: "html",
			selector: "p",
		},
		textblockAlignment: {
			type: "string",
			default: "center",
		},
		bodyColor: {
			type: "string",
			default: "#222",
		},
		backgroundImg: {
			type: "string",
			default: null,
		},
		overlayColor: {
			type: "string",
			default: "#000",
		},
		overlayOpacity: {
			type: "number",
			default: 0.0,
		},
	},

    
	// built-in function

	edit: ({ attributes, setAttributes }) => {
		const {
			title,
			body,
			titleColor,
			bodyColor,
			backgroundImg,
			overlayColor,
			overlayOpacity,
			textblockAlignment,
		} = attributes;


		// custom functions
		function updateTitle(newTitle) {
			setAttributes({ title: newTitle });
		}

		function updateText(newText) {
			setAttributes({ body: newText });
		}

		function onAlignmentChange(newAlignement) {
			setAttributes({ textblockAlignment: newAlignement === undefined ? 'none' : newAlignement});
		}

		function onTitleColorChange(newColor) {
			setAttributes({ titleColor: newColor });
		}

		function onBodyColorChange(newColor) {
			setAttributes({ bodyColor: newColor });
		}

		function onSelectImage(newImage) {
			setAttributes({ backgroundImg: newImage.sizes.full.url });
		}

		function onOverlayColorChange(newOverlayColor) {
			setAttributes({ overlayColor: newOverlayColor });
		}

		function onOverlayOpacityChange(newOpacity) {
			setAttributes({ overlayOpacity: newOpacity });
		}

		return [
			<InspectorControls style={{ marginBottom: "30px" }}>
				<PanelBody title={"Font Colors"}>
					<p>
						<strong>Select a title color:</strong>
					</p>

					<ColorPalette value={titleColor} onChange={onTitleColorChange} />
					<p>
						<strong>Select a title color:</strong>
					</p>

					<ColorPalette value={bodyColor} onChange={onBodyColorChange} />
				</PanelBody>
				<PanelBody title={"Image Upload"}>
					<p>
						<strong>Select an image to upload:</strong>
					</p>
					<MediaUpload
						onSelect={onSelectImage}
						type="image"
						value={backgroundImg}
						render={({ open }) => (
							<IconButton
								onClick={open}
								icon="upload"
								className="editor-media-placeholder__button
                                is-button is-default is-large"
							>
								Background Image
							</IconButton>
						)}
					/>

					<p>
						<strong>Select overlay color:</strong>
					</p>
					<ColorPalette value={overlayColor} onChange={onOverlayColorChange} />

					<p>
						<strong>Select overlay opcaity:</strong>
					</p>

					<RangeControl
						label={"Overlay Opacity"}
						value={overlayOpacity}
						onChange={onOverlayOpacityChange}
						min={0}
						max={1}
						step={0.01}
					/>
				</PanelBody>
			</InspectorControls>,
			<div
            className="custom-card-container"
            style={{
                backgroundImage: `url(${backgroundImg})`,
                backgroundSize: "cover",
                backgroundPosition: "center",
                backgroundRepeat: "no-repeat",
            }}
			>

				<div
					className="custom-card-overlay"
					style={{
                        backgroundColor: overlayColor,
						opacity: overlayOpacity,
					}}
				></div>

                    <InnerBlocks placeholder="Add an image" allowedBlocks={ALLOWED_BLOCKS}/>
				{
					<BlockControls>
						<AlignmentToolbar
							value={textblockAlignment}
							onChange={onAlignmentChange}
						/>
					</BlockControls>
				}

				<RichText
					key="editable"
					tagName="h2"
					placeholder="You title..."
					value={title}
					onChange={updateTitle}
					style={{ color: titleColor, textAlign: textblockAlignment }}
				/>
				<RichText
					key="editable"
					tagName="p"
					placeholder="You text..."
					value={body}
					onChange={updateText}
					style={{ color: bodyColor, textAlign: textblockAlignment  }}
				/>
			</div>,
		];
	},

	save: ({ attributes }) => {
		const {
			title,
			body,
			titleColor,
			bodyColor,
			backgroundImg,
			overlayColor,
			overlayOpacity,
            textblockAlignment,
		} = attributes;

		return (
			<div
				className="custom-card-container"
				style={{
					backgroundImage: `url(${backgroundImg})`,
					backgroundSize: "cover",
					backgroundPosition: "center",
					backgroundRepeat: "no-repeat",
				}}
			>
                <InnerBlocks.Content />
				<div
					className="custom-card-overlay"
					style={{
						background: overlayColor,
						opacity: overlayOpacity,
					}}
				></div>
				<h2 style={{ color: titleColor, textAlign: textblockAlignment }}>{title}</h2>

				<RichText.Content
					tagName="p"
					style={{ color: bodyColor, textAlign: textblockAlignment }}
					value={body}
				/>
			</div>
		);
	},
});
