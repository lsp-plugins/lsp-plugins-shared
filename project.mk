# Package version
ARTIFACT_NAME               = lsp-plugins-shared
ARTIFACT_DESC               = Shared resources for LSP Plugins
ARTIFACT_VARS               = LSP_PLUGINS_SHARED
ARTIFACT_HEADERS            = lsp-plug.in
ARTIFACT_VERSION            = 0.5.0-devel
ARTIFACT_EXPORT_ALL         = 1

# Weak property
DEMO_TEST                  := 1

# List of dependencies
DEPENDENCIES = \
  STDLIB \
  LSP_COMMON_LIB \
  LSP_PLUGIN_FW

TEST_DEPENDENCIES = \
  LSP_TEST_FW

ALL_DEPENDENCIES = \
  $(DEPENDENCIES) \
  $(TEST_DEPENDENCIES)
